using System;
using System.Collections.Generic;
using System.Linq;
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
using System.Net.Http;

namespace Timber
{
    /// <summary>
    /// Interaction logic for RegisterWindow.xaml
    /// </summary>
    public partial class RegisterWindow : Window
    {
        public RegisterWindow(LoginWindow loginWindow)
        {
            InitializeComponent();
            client = loginWindow.client;
        }

        HttpClient client;

        private void RegisterBtnClick(object sender, RoutedEventArgs e)
        {
            Register();
        }

        private async Task<string> Register()
        {
            User user = new User()
            {
                username = usernameTb.Text,
                password = passwordTb.Text,
                Email = emailTb.Text
            };
            var json = JsonConvert.SerializeObject(user);
            var data = new StringContent(json, Encoding.UTF8, "application/json");

            var url = "http://localhost/api/register";
            var response = await client.PostAsync(url, data);

            string result = response.Content.ReadAsStringAsync().Result;
            MessageBox.Show(result);
            return result;
        }
        //Going to need email, username and password
    }
}
