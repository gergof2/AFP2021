#include "LoginWindow.h"
#include "cpr/cpr.h"
#include "string"
#include "nlohmann/json.hpp"
using namespace nlohmann;

wxBEGIN_EVENT_TABLE(LoginWindow, wxFrame)
EVT_BUTTON(10001, loginButtonClick)
EVT_BUTTON(10002, registerButtonClick)
wxEND_EVENT_TABLE()

LoginWindow::LoginWindow() : wxFrame(nullptr, wxID_ANY, "Timber Desktop", wxPoint(30, 30), wxSize(390, 250))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
	this->SetMinSize(wxSize(380, 250));
	this->SetMaxSize(wxSize(380, 250));
	TitleLabel = new wxStaticText(this, wxID_ANY, "Timber Desktop", wxPoint(50, 35), wxSize(60, 25), 0, wxStaticTextNameStr);
	TitleLabel->SetFont(wxFont(26, wxFONTFAMILY_SWISS, wxFONTSTYLE_NORMAL, wxFONTWEIGHT_BOLD, false));
	//TitleLabel->SetBackgroundColour(wxColor(156, 77, 127));
	usernameLabel = new wxStaticText(this, wxID_ANY, "Username:", wxPoint(45, 115), wxSize(60, 25), 0, wxStaticTextNameStr);
	passwordLabel = new wxStaticText(this, wxID_ANY, "Password:", wxPoint(45, 145), wxSize(60, 25), 0, wxStaticTextNameStr);
	loginBtn = new wxButton(this, 10001, "Log In", wxPoint(195, 175), wxSize(90, 25));
	registerBtn = new wxButton(this, 10002, "Register", wxPoint(80, 175), wxSize(90, 25));
	usernameTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(120, 110), wxSize(200, 25));
	passwordTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(120, 140), wxSize(200, 25), wxTE_PASSWORD);
}

LoginWindow::~LoginWindow()
{

}

void LoginWindow::loginButtonClick(wxCommandEvent& evt)
{
	//if (registerWindow != nullptr) this->registerWindow->Close();
	std::string username = (usernameTb->GetValue().ToStdString());
	std::string password = (passwordTb->GetValue().ToStdString());

	json myJson = json{
		{"username", username },
		{"password", password },
	};

	cpr::Response r = cpr::Post(cpr::Url{ "http://localhost/api/clientLogin" },
		cpr::Body{ myJson.dump() },
		cpr::Header{ {"content-type", "application/json"} });

	if (isdigit(r.text[0]))
	{
		Close();
		int sessionId = std::stoi(r.text);
		mainWindow = new MainWindow(sessionId);
		mainWindow->Show();
	}

	else
	{
		wxMessageBox("Invalid username or password.");
	}
	

	evt.Skip();
}

void LoginWindow::registerButtonClick(wxCommandEvent& evt)
{
	registerWindow = new RegisterWindow();
	registerWindow->Show();
	evt.Skip();
}
