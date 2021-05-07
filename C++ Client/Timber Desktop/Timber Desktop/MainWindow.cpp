#include "MainWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"
#include <thread>
using namespace nlohmann;
using namespace std;

wxBEGIN_EVENT_TABLE(MainWindow, wxFrame)
EVT_BUTTON(10001, ButtonClick)
wxEND_EVENT_TABLE();

struct MessageStruct
{
	std::string username;
	std::string text;
	std::string id;
	std::string timedate;
};

void from_json(const nlohmann::json& j, MessageStruct& msg)
{
	j.at("username").get_to(msg.username);
	j.at("text").get_to(msg.text);
	j.at("id").get_to(msg.id);
	j.at("timedate").get_to(msg.timedate);
}

vector<MessageStruct> getMessages()
{
	cpr::Response r = cpr::Get(cpr::Url{ "http://localhost/api/messages" });

	nlohmann::json myJson = nlohmann::json::parse(r.text);
	vector<MessageStruct> parsed = myJson.get<vector<MessageStruct>>();
	return parsed;
}

vector<MessageStruct> messages;

void MainWindow::drawMessages()
{
	vector<MessageStruct> olderMessages = getMessages();
	for (MessageStruct message : olderMessages)
	{
		messages.push_back(message);
	}

	messageLb->Clear();
	for (MessageStruct message : olderMessages)
	{
		wxString text = message.text;
		wxString date = message.timedate;
		wxString user = message.username;
		int id = wxAtoi(message.id);

		messageLb->AppendString(user + ": " + text + "   " + date);
	}
}

void MainWindow::ConstantRefresh()
{
	while (true)
	{
		MainWindow::drawMessages();
		std::this_thread::sleep_for(std::chrono::seconds(2));
	}
}

void MainWindow::ButtonClick(wxCommandEvent& evt)
{
	string text = messageTb->GetValue().ToStdString();
	json myJson = json{
		{"userid", sessionId},
		{"text", text}
	};
	wxMessageBox(myJson.dump());
	cpr::Response r = cpr::Post(cpr::Url{ "localhost/api/clientSendMessage" },
		cpr::Body{ myJson.dump() },
		cpr::Header{ {"content-type", "application/json"} });
	wxMessageBox(r.text);
	evt.Skip();
}



MainWindow::MainWindow(int sessionId) : wxFrame(nullptr, wxID_ANY, "Timber Desktop", wxPoint(30, 30), wxSize(950, 570))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
	this->sessionId = sessionId;
	sendMsgBtn = new wxButton(this, 10001, "Send Message", wxPoint(10, 490), wxSize(100, 25));
	messageTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(10, 430), wxSize(710, 50));
	messageLb = new wxListBox(this, wxID_ANY, wxPoint(10, 10), wxSize(710, 410));
	//auto future = std::async(launch::async, std::bind(&MainWindow::ConstantRefresh, this));
	int i = 2;
	//std::thread t(MainWindow::ConstantRefresh(), i);
	t = new std::thread(&MainWindow::ConstantRefresh, this);
}

MainWindow::~MainWindow()
{
}
