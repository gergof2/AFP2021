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
	wxStaticText* TitleLabel = nullptr;
	wxStaticText* usernameLabel = nullptr;
	wxStaticText* passwordLabel = nullptr;
	wxButton* loginBtn = nullptr;
	wxButton* registerBtn = nullptr;
	wxTextCtrl* usernameTb = nullptr;
	wxTextCtrl* passwordTb = nullptr;

	void loginButtonClick(wxCommandEvent& evt);
	void registerButtonClick(wxCommandEvent& evt);
	wxDECLARE_EVENT_TABLE();
};

