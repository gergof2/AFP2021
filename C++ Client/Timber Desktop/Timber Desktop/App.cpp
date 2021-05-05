#include "App.h"

wxIMPLEMENT_APP(App);

App::App()
{
}

App::~App()
{
}

bool App::OnInit()
{
	loginWindow = new LoginWindow();
	loginWindow->Show();

	return true;
}
