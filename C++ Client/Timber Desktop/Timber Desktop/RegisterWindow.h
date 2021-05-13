#pragma once

#include "wx/wx.h"
using namespace std;

class RegisterWindow : public wxFrame
{
public: 
	RegisterWindow();
	~RegisterWindow();

public:
	wxStaticText* emailLabel = nullptr;
	wxStaticText* usernameLabel = nullptr;
	wxStaticText* passwordLabel = nullptr;
	wxButton* registerButton = nullptr;
	wxTextCtrl* emailTb = nullptr;
	wxTextCtrl* usernameTb = nullptr;
	wxTextCtrl* passwordTb = nullptr;

	void registerButtonClick(wxCommandEvent& evt);
	bool registerApiCall(string email, string username, string password);
	wxDECLARE_EVENT_TABLE();
};

