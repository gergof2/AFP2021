using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Timber.Classes
{
    public class Message
    {
        public Message(string username, string text, DateTime date)
        {
            this.username = username;
            this.text = text;
            this.date = date;
        }

        public int id;
        public string username;
        public string text;
        public DateTime date;


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
