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
	std::thread* t = nullptr;
	int sessionId;

public:
	void ButtonClick(wxCommandEvent& evt);
	void drawMessages();
	void ConstantRefresh();
	

	wxDECLARE_EVENT_TABLE();
};

