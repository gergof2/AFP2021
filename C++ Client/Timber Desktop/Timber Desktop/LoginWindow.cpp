#include "LoginWindow.h"
#include "cpr/cpr.h"
#include "string"
#include "nlohmann/json.hpp"
using namespace nlohmann;

wxBEGIN_EVENT_TABLE(LoginWindow, wxFrame)
EVT_BUTTON(10001, loginButtonClick)
EVT_BUTTON(10002, registerButtonClick)
wxEND_EVENT_TABLE()

LoginWindow::LoginWindow() : wxFrame(nullptr, wxID_ANY, "Timber Desktop", wxPoint(30, 30), wxSize(310, 400))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
	loginBtn = new wxButton(this, 10001, "Log In", wxPoint(93, 320), wxSize(100, 25));
	registerBtn = new wxButton(this, 10002, "Log In", wxPoint(93, 320), wxSize(100, 25));
	usernameTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(45, 260), wxSize(200, 25));
	passwordTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(45, 290), wxSize(200, 25));
}

LoginWindow::~LoginWindow()
{

}

void LoginWindow::loginButtonClick(wxCommandEvent& evt)
{
	std::string username = (usernameTb->GetValue().ToStdString());
	std::string password = (usernameTb->GetValue().ToStdString());

	json myJson = json{
		{"username", username },
		{"password", password },
	};

	

	evt.Skip();
}

void LoginWindow::registerButtonClick(wxCommandEvent& evt)
{
	evt.Skip();
}
