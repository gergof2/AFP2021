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
using System.Windows.Navigation;
using System.Windows.Shapes;
using Timber.Classes;
using Newtonsoft.Json;

namespace Timber
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow(int SessionId, string username, HttpClient client)
        {
            InitializeComponent();
            this.SessionId = SessionId;
            this.client = client;
            this.username = username;

            GetMessages();
        }

        #region Variables
        public List<Message> messages = new List<Message>();
        public List<string> OnlineUsers = new List<string>();
        public int SessionId;
        public string username;
        HttpClient client;
        #endregion

        #region Message Sending Functions
        private void Button_Click(object sender, RoutedEventArgs e)
        {
            if (textBox.Text != "")
            {
                SendMessage();
            }
            textBox.Text = "";
            GetMessages();
        }
        private async void SendMessage()
        {
            Message newMessage = new Message(username, textBox.Text, DateTime.Now);
            var json = JsonConvert.SerializeObject(newMessage);
            var data = new StringContent(json, Encoding.UTF8, "application/json");
            var url = "http://localhost/api/sendmessages";
            var response = await client.PostAsync(url, data);

            string result = response.Content.ReadAsStringAsync().Result;

            MessageBox.Show(result);

        }
        #endregion

        #region Data Receiving Functions
        private async void GetMessages()
        {
            var url = "http://localhost/api/messages";
            var response = await client.GetAsync(url);
            var jsonResult = response.Content.ReadAsStringAsync().Result;

            if (jsonResult == "Nincs üzenet!")
            {
                MessageBox.Show("Nincs üzenet!");
            }
            else
            {
                messages = JsonConvert.DeserializeObject<List<Message>>(jsonResult);
                RefreshMessages();
            }
        }
        #endregion

        #region UI Functions
        private void EnterPress(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Return)
            {
                SendMessage();
            }
        }
        private void ScrollToBottom()
        {
            lock (typeof(MainWindow))
            {
                object LastMessage = MsgListBox.Items[MsgListBox.Items.Count - 1];
                MsgListBox.ScrollIntoView((object)LastMessage);
            }
        }
        private void RefreshMessages()
        {
            MsgListBox.Items.Clear();
            for (int i = messages.Count - 1; i >= 0; i--)
            {
                MsgListBox.Items.Insert(0, messages[i]);
            }
            MsgListBox.SelectedItem = null;
            ScrollToBottom();
        }
        private void RefreshOnlineUsers()
        {
            /*
            lock (typeof(MainWindow))
            {
                UserListBox.Items.Clear();
                for (int i = 0; i < OnlineUsers.Count - 1; i++)
                {
                    UserListBox.Items.Add(OnlineUsers[i]);
                }
            }
            */
        }
        #endregion
    }
}
