#include "RegisterWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"
using namespace nlohmann;

wxBEGIN_EVENT_TABLE(RegisterWindow, wxFrame)
EVT_BUTTON(10001, registerButtonClick)
wxEND_EVENT_TABLE()

RegisterWindow::RegisterWindow() : wxFrame(nullptr, wxID_ANY, "Create Account", wxPoint(10, 10), wxSize(390, 190))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));

	this->SetMinSize(wxSize(390, 190));
	this->SetMaxSize(wxSize(390, 190));

	emailLabel = new wxStaticText(this, wxID_ANY, "Email:", wxPoint(45, 25), wxSize(60, 25), 0, wxStaticTextNameStr);
	usernameLabel = new wxStaticText(this, wxID_ANY, "Username:", wxPoint(45, 55), wxSize(60, 25), 0, wxStaticTextNameStr);
	passwordLabel = new wxStaticText(this, wxID_ANY, "Password:", wxPoint(45, 85), wxSize(60, 25), 0, wxStaticTextNameStr);

	emailTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(120, 20), wxSize(200, 25));
	usernameTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(120, 50), wxSize(200, 25));
	passwordTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(120, 80), wxSize(200, 25));

	registerButton = new wxButton(this, 10001, "Create Account", wxPoint(80, 115), wxSize(200, 25));
}

void RegisterWindow::registerButtonClick(wxCommandEvent& evt)
{
	string email = emailTb->GetValue().ToStdString();
	string username = usernameTb->GetValue().ToStdString();
	string password = passwordTb->GetValue().ToStdString();
	bool successfulReg = registerApiCall(email, username, password);
	if (successfulReg)
	{
		wxMessageBox("Account creation successful! Feel free to log in!");
		Close();
	}
	else 
	{
		wxMessageBox("Something went wrong...");
	}
}

bool RegisterWindow::registerApiCall(string email, string username, string password)
{
	json myJson = json{
		{"username", username},
		{"password", password},
		{"Email", email}
	};

	cpr::Response r = cpr::Post(cpr::Url{ "http://localhost/api/clientRegister" },
		cpr::Header{ {"content-type", "application/json"} },
		cpr::Body{ myJson.dump() });

	return r.text == "Successful registration!";
}

RegisterWindow::~RegisterWindow()
{
}
