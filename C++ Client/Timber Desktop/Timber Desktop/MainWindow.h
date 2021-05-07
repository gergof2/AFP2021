#pragma once

#include "wx/wx.h"
#include <thread>


class MainWindow : public wxFrame
{
public:
	MainWindow(int sessionId);
	~MainWindow();

public:
	wxButton* sendMsgBtn = nullptr;
	wxTextCtrl* messageTb = nullptr;
	wxListBox* messageLb = nullptr;
	wxListBox* userLb = nullptr;
	std::thread* messageThread = nullptr;
	std::thread* userThread = nullptr;
	int sessionId;

public:
	void postMessage(wxCommandEvent& evt);
	void drawMessages();
	void constantRefreshMessages();
	void drawUsers();
	void constantRefreshUsers();
	
	

	wxDECLARE_EVENT_TABLE();
};

