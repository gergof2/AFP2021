#pragma once

#include "wx/wx.h"
#include "MainWindow.h"
#include "RegisterWindow.h"

class LoginWindow : public wxFrame
{
public:
	LoginWindow();
	~LoginWindow();

private:
	MainWindow* mainWindow = nullptr;
	RegisterWindow* registerWindow = nullptr;

public:
	wxButton* loginBtn = nullptr;
	wxButton* registerBtn = nullptr;
	wxTextCtrl* usernameTb = nullptr;
	wxTextCtrl* passwordTb = nullptr;

	void loginButtonClick(wxCommandEvent& evt);
	void registerButtonClick(wxCommandEvent& evt);
	wxDECLARE_EVENT_TABLE();
};

