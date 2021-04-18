using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Timber.Classes
{
    public class Message
    {
        public Message(string username, string text, DateTime timedate)
        {
            this.username = username;
            this.text = text;
            this.timedate = timedate;
        }

        private int _id;
        private string _username;
        private string _text;
        private DateTime _timedate;

        public int id
        {
            get { return _id; }
            set { _id = value; }
        }
        public string username
        {
            get { return _username; }
            set { _username = value; }
        }
        public string text
        {
            get { return _text; }
            set { _text = value; }
        }
        public DateTime timedate
        {
            get { return _timedate; }
            set { _timedate = value; }
        }

        public override bool Equals(object obj)
        {
            if (obj == null)
            {
                return false;
            }
            if (!(obj is Message))
            {
                return false;
            }
            return this.text == ((Message)obj).text
                && this.id == ((Message)obj).id;
        }
    }
}
