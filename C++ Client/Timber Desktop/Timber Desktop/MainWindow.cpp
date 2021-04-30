#include "MainWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"

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

void MainWindow::ButtonClick(wxCommandEvent& evt)
{
	evt.Skip();
}

MainWindow::MainWindow(int sessionId) : wxFrame(nullptr, wxID_ANY, "Timber Desktop", wxPoint(30, 30), wxSize(950, 570))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
	this->sessionId = sessionId;
	sendMsgBtn = new wxButton(this, 10001, "Send Message", wxPoint(10, 490), wxSize(100, 25));
	messageTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(10, 430), wxSize(710, 50));
	messageLb = new wxListBox(this, wxID_ANY, wxPoint(10, 10), wxSize(710, 410));
}

MainWindow::~MainWindow()
{
}
