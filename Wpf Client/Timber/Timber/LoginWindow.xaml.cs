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

        public HttpClient client = new HttpClient();


        private void LoginButtonClick(object sender, RoutedEventArgs e)
        {
            User loggedInUser = new User(usernameBox.Text, passwordBox.Text);
            Login();
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

            var json = JsonConvert.SerializeObject(user);
            var data = new StringContent(json, Encoding.UTF8, "application/json");
            
            MessageBox.Show(json);
            var url = "http://localhost/api/login";
            var response = await client.PostAsync(url, data);

            string result = response.Content.ReadAsStringAsync().Result;
            MessageBox.Show(result);
            return user;

        }

        
    }
}
