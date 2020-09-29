using System;
using System.Collections.Generic;

namespace NorthwindREST.Models
{
    public partial class Territories
    {
        public string TerritoryId { get; set; }
        public string TerritoryDescription { get; set; }
        public int RegionId { get; set; }
    }
}
