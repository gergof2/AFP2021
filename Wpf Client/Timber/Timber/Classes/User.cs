﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;

namespace Timber.Classes
{
    class User
    {
        public User(string Username, string Password)
        {
            this.username = Username;
            this.Password = Password;
        }

        private int id;
        public int Id { get; }

        public string username;

        private string password;
        public string Password
        {
            set 
            {
                password = value;
            }
        }

        private string email;
        public string Email
        {
            get { return email; }
            set
            {
                if (Regex.IsMatch(email,
                    @"[a - z0 - 9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?",
                    RegexOptions.IgnoreCase,
                    TimeSpan.FromMilliseconds(250)))
                {
                    email = value;
                }
                else
                {
                    throw new Exception("Must enter a valid email address!");
                }
            }
        }

        private DateTime registerDate;
        public DateTime RegisterDate
        {
            get { return registerDate; }
            set { registerDate = value; }
        }


    }
}
