#pragma once

#include "wx/wx.h"
#include "MainWindow.h"

class LoginWindow : wxFrame
{
public:
	LoginWindow();
	~LoginWindow();

private:
	MainWindow* mainWindow = nullptr;

public:
	wxButton* loginBtn = nullptr;
	wxButton* registerBtn = nullptr;
	wxTextCtrl* usernameTb = nullptr;
	wxTextCtrl* passwordTb = nullptr;

	void loginButtonClick(wxCommandEvent& evt);
	void registerButtonClick(wxCommandEvent& evt);
	wxDECLARE_EVENT_TABLE();
};

