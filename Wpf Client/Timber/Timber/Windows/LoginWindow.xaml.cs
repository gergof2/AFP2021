using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using Timber.Classes;
using Newtonsoft.Json;


namespace Timber
{
    /// <summary>
    /// Interaction logic for LoginWindow.xaml
    /// </summary>
    public partial class LoginWindow : Window
    {
        public LoginWindow()
        {
            InitializeComponent();
            client.BaseAddress = new Uri("http://localhost/api/");
        }

        MainWindow mainWindow;
        public HttpClient client = new HttpClient();
        public int SessionId = -1;
        User loggedInUser;

        private async void LoginButtonClick(object sender, RoutedEventArgs e)
        {
            loggedInUser = new User(usernameBox.Text, passwordBox.Text);
            await Login();
            if (SessionId != -1)
            {
                OpenMainWindow();
            }

        }

        private void OpenMainWindow()
        {
            mainWindow = new MainWindow(SessionId, loggedInUser.username, client);
            mainWindow.Show();
            Close();
        }

        private void OpenRegisterWindow(object sender, RoutedEventArgs e)
        {
            RegisterWindow registerWindow = new RegisterWindow(this);
            registerWindow.ShowDialog();

        }

        private async Task<User> Login()
        {

            User user = new User()
            {
                username = usernameBox.Text,
                password = passwordBox.Text
            };

            if (user.username == null || user.username == "" || user.password == null || user.password == "")
            {
                MessageBox.Show("Üres az egyik mező!");
                return null;
            }
            else
            {
                var json = JsonConvert.SerializeObject(user);
                var data = new StringContent(json, Encoding.UTF8, "application/json");

                User backUser = JsonConvert.DeserializeObject<User>(json);

                var url = "http://localhost/api/login";
                var response = await client.PostAsync(url, data);

                string result = response.Content.ReadAsStringAsync().Result;
                if (result != "Sikertelen belépés! Nincs ilyen felhasználó!")
                {
                    MessageBox.Show("Sikeres belépés!");
                    this.SessionId = int.Parse(result);
                    //MessageBox.Show($"Session Id: {SessionId}");
                    return user;
                }
                else MessageBox.Show(result);
                return null;
            }
        }


    }
}
