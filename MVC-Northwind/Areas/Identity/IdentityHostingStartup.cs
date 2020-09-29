using System;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Identity.UI;
using Microsoft.EntityFrameworkCore;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using MVC_Northwind.Data;

[assembly: HostingStartup(typeof(MVC_Northwind.Areas.Identity.IdentityHostingStartup))]
namespace MVC_Northwind.Areas.Identity
{
    public class IdentityHostingStartup : IHostingStartup
    {
        public void Configure(IWebHostBuilder builder)
        {
            builder.ConfigureServices((context, services) => {
                services.AddDbContext<MVC_NorthwindContext>(options =>
                    options.UseSqlServer(
                        context.Configuration.GetConnectionString("MVC_NorthwindContextConnection")));

                services.AddDefaultIdentity<IdentityUser>(options => options.SignIn.RequireConfirmedAccount = true)
                    .AddEntityFrameworkStores<MVC_NorthwindContext>();
            });
        }
    }
}