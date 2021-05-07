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
	int sessionId;

public:
	void postMessage(wxCommandEvent& evt);
	void drawMessages();
	void constantRefreshMessages();
	void drawUsers();
	
	

	wxDECLARE_EVENT_TABLE();
};

