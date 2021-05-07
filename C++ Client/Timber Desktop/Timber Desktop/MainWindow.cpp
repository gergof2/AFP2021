#include "MainWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"
#include <thread>
using namespace nlohmann;
using namespace std;

#pragma region Static Variables

wxBEGIN_EVENT_TABLE(MainWindow, wxFrame)
EVT_BUTTON(10001, postMessage)
wxEND_EVENT_TABLE();

struct MessageStruct
{
	std::string username;
	std::string text;
	std::string id;
	std::string timedate;
};
struct UserStruct {
	std::string username;
	std::string id;
	std::string email;
	std::string registerdate;
	std::string statusid;
};
vector<MessageStruct> messages;
vector<UserStruct> users;
vector<int> drawnOutMessages;

#pragma endregion

#pragma region Message Functions

#pragma region Data Handling

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

#pragma endregion

#pragma region Message List GUI

void MainWindow::drawMessages()
{
	vector<MessageStruct> olderMessages = getMessages();
	for (MessageStruct message : olderMessages)
	{
		messages.push_back(message);
	}

	for (MessageStruct message : olderMessages)
	{
		wxString text = message.text;
		wxString date = message.timedate;
		wxString user = message.username;
		int id = wxAtoi(message.id);

		if (!count(drawnOutMessages.begin(), drawnOutMessages.end(), id))
		{
			messageLb->AppendString(user + ": " + text + "   " + date);
			drawnOutMessages.push_back(id);
		}
	}
}

void MainWindow::constantRefreshMessages()
{
	while (true)
	{
		MainWindow::drawMessages();
		std::this_thread::sleep_for(std::chrono::seconds(2));
	}
}

#pragma endregion

void MainWindow::postMessage(wxCommandEvent& evt)
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

#pragma endregion

#pragma region User List Functions

void from_json(const nlohmann::json& j, UserStruct& user)
{
	j.at("username").get_to(user.username);
	j.at("id").get_to(user.id);
	j.at("statusid").get_to(user.statusid);
}

vector<UserStruct> getUsers()
{
	cpr::Response r = cpr::Get(cpr::Url{ "http://localhost/api/clientGetUsers" });
	nlohmann::json myJson = nlohmann::json::parse(r.text);
	vector<UserStruct> parsed = myJson.get<vector<UserStruct>>();

	return parsed;
}

void MainWindow::drawUsers()
{
	users = getUsers();
	for (UserStruct user : users)
	{
		userLb->AppendString(user.username);
	}
}

#pragma endregion


MainWindow::MainWindow(int sessionId) : wxFrame(nullptr, wxID_ANY, "Timber Desktop", wxPoint(30, 30), wxSize(950, 570))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
	this->sessionId = sessionId;
	sendMsgBtn = new wxButton(this, 10001, "Send Message", wxPoint(10, 490), wxSize(100, 25));
	messageTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(10, 430), wxSize(710, 50));
	messageLb = new wxListBox(this, wxID_ANY, wxPoint(10, 10), wxSize(710, 410));
	userLb = new wxListBox(this, wxID_ANY, wxPoint(730, 10), wxSize(195, 410));
	//auto future = std::async(launch::async, std::bind(&MainWindow::ConstantRefresh, this));
	int i = 2;
	//std::thread t(MainWindow::ConstantRefresh(), i);
	t = new std::thread(&MainWindow::ConstantRefresh, this);
}

MainWindow::~MainWindow()
{
}
