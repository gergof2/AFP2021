#include "RegisterWindow.h"
#include "cpr/cpr.h"
#include "nlohmann/json.hpp"
using namespace nlohmann;
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
}

bool RegisterWindow::registerApiCall(string email, string username, string password)
{
}

RegisterWindow::~RegisterWindow()
{
}
