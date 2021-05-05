#include "MainWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"

#include <future>
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
	messages = getMessages();
	for (MessageStruct message : messages)
	{
		wxString text = message.text;
		wxString date = message.timedate;
		wxString user = message.username;

		messageLb->AppendString(user + ": " + text + "   " + date);
		
		//messageLb->SetFont(wxFont(20, wxFONTFAMILY_DEFAULT, wxFONTSTYLE_NORMAL, wxFONTWEIGHT_BOLD, true));
		//messageLb->GetItem(3)->SetFont(wxFont(20, wxFONTFAMILY_DEFAULT, wxFONTSTYLE_NORMAL, wxFONTWEIGHT_BOLD, true));
		//messageLb->AppendString();
	}
	//messageLb->SetFont(wxFont(20, wxFONTFAMILY_DEFAULT, wxFONTSTYLE_NORMAL, wxFONTWEIGHT_BOLD, true));
	//messageLb->GetItem(2)->SetBackgroundColour(wxColor(*wxRED));
}

void MainWindow::ConstantRefresh()
{
	while (true)
	{
		std::this_thread::sleep_for(std::chrono::milliseconds(200));
		MainWindow::drawMessages();
		messageLb->AppendString("---");
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
	drawMessages();
}

MainWindow::~MainWindow()
{
}
