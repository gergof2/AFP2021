#include "RegisterWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"
using namespace nlohmann;

wxBEGIN_EVENT_TABLE(RegisterWindow, wxFrame)
EVT_BUTTON(10001, registerButtonClick)
wxEND_EVENT_TABLE()

RegisterWindow::RegisterWindow() : wxFrame(nullptr, wxID_ANY, "Create Account", wxPoint(10, 10), wxSize(400, 310))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
	emailTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(45, 20), wxSize(200, 25));
	usernameTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(45, 50), wxSize(200, 25));
	passwordTb = new wxTextCtrl(this, wxID_ANY, "", wxPoint(45, 100), wxSize(200, 25));
	registerButton = new wxButton(this, 10001, "", wxPoint(45, 200), wxSize(200, 25));
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