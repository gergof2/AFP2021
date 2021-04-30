#include "MainWindow.h"

MainWindow::MainWindow(int sessionId) : wxFrame(nullptr, wxID_ANY, "Timber Desktop", wxPoint(30, 30), wxSize(950, 570))
{
	this->SetBackgroundColour(wxColor(*wxWHITE));
}
