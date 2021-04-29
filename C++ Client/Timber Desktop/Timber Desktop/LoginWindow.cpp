#include "LoginWindow.h"
#include "cpr/cpr.h"
#include "string"
#include "nlohmann/json.hpp"
using namespace nlohmann;

wxBEGIN_EVENT_TABLE(LoginWindow, wxFrame)
EVT_BUTTON(10001, loginButtonClick)
EVT_BUTTON(10002, registerButtonClick)
wxEND_EVENT_TABLE()