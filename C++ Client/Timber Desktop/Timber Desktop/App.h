#pragma once

#include "wx/wx.h"
#include "LoginWindow.h"

class App : public wxApp
{
public:
	App();
	~App();

private:
	LoginWindow* loginWindow = nullptr;

	virtual bool OnInit();
};

