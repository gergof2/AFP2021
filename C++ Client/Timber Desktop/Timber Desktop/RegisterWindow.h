#pragma once

#include "wx/wx.h"
using namespace std;

class RegisterWindow : public wxFrame
{
public: 
	RegisterWindow();
	~RegisterWindow();

public:
	wxButton* registerButton = nullptr;
	wxTextCtrl* emailTb = nullptr;
	wxTextCtrl* usernameTb = nullptr;
	wxTextCtrl* passwordTb = nullptr;

	void registerButtonClick(wxCommandEvent& evt);
	bool registerApiCall(string email, string username, string password);
	wxDECLARE_EVENT_TABLE();
};

