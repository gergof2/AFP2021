#pragma once

#include "wx/wx.h"


class MainWindow : public wxFrame
{
public:
	MainWindow(int sessionId);
	~MainWindow();

public:
	wxButton* sendMsgBtn = nullptr;
	wxTextCtrl* messageTb = nullptr;
	wxListBox* messageLb = nullptr;

	int sessionId;

	
};

