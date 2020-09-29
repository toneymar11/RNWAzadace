using System;
using System.Collections.Generic;

namespace NorthwindREST.Models
{
    public partial class Tbluser
    {
        public int Id { get; set; }
        public string Firstname { get; set; }
        public string Lastname { get; set; }
        public string Email { get; set; }
        public string Password { get; set; }
    }
}
