using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

namespace NorthwindREST.Models
{
    public partial class northwindContext : DbContext
    {
        public northwindContext()
        {
        }

        public northwindContext(DbContextOptions<northwindContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Categories> Categories { get; set; }
        public virtual DbSet<Customercustomerdemo> Customercustomerdemo { get; set; }
        public virtual DbSet<Customerdemographics> Customerdemographics { get; set; }
        public virtual DbSet<Customers> Customers { get; set; }
        public virtual DbSet<Employees> Employees { get; set; }
        public virtual DbSet<Employeeterritories> Employeeterritories { get; set; }
        public virtual DbSet<OrderDetails> OrderDetails { get; set; }
        public virtual DbSet<Orders> Orders { get; set; }
        public virtual DbSet<Products> Products { get; set; }
        public virtual DbSet<Region> Region { get; set; }
        public virtual DbSet<Shippers> Shippers { get; set; }
        public virtual DbSet<Suppliers> Suppliers { get; set; }
        public virtual DbSet<Tbluser> Tbluser { get; set; }
        public virtual DbSet<Territories> Territories { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. See http://go.microsoft.com/fwlink/?LinkId=723263 for guidance on storing connection strings.
                optionsBuilder.UseMySQL("server=localhost;port=3306;user=root;password=;database=northwind");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Categories>(entity =>
            {
                entity.HasKey(e => e.CategoryId)
                    .HasName("PRIMARY");

                entity.ToTable("categories");

                entity.HasIndex(e => e.CategoryName)
                    .HasName("CategoryName");

                entity.Property(e => e.CategoryId).HasColumnName("CategoryID");

                entity.Property(e => e.CategoryName)
                    .IsRequired()
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.Description).HasColumnType("mediumtext");

                entity.Property(e => e.Picture).HasColumnType("longblob");
            });

            modelBuilder.Entity<Customercustomerdemo>(entity =>
            {
                entity.HasKey(e => new { e.CustomerId, e.CustomerTypeId })
                    .HasName("PRIMARY");

                entity.ToTable("customercustomerdemo");

                entity.Property(e => e.CustomerId)
                    .HasColumnName("CustomerID")
                    .HasMaxLength(5)
                    .IsUnicode(false);

                entity.Property(e => e.CustomerTypeId)
                    .HasColumnName("CustomerTypeID")
                    .HasMaxLength(10)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Customerdemographics>(entity =>
            {
                entity.HasKey(e => e.CustomerTypeId)
                    .HasName("PRIMARY");

                entity.ToTable("customerdemographics");

                entity.Property(e => e.CustomerTypeId)
                    .HasColumnName("CustomerTypeID")
                    .HasMaxLength(10)
                    .IsUnicode(false);

                entity.Property(e => e.CustomerDesc).HasColumnType("mediumtext");
            });

            modelBuilder.Entity<Customers>(entity =>
            {
                entity.HasKey(e => e.CustomerId)
                    .HasName("PRIMARY");

                entity.ToTable("customers");

                entity.HasIndex(e => e.City)
                    .HasName("City");

                entity.HasIndex(e => e.CompanyName)
                    .HasName("CompanyName");

                entity.HasIndex(e => e.PostalCode)
                    .HasName("PostalCode");

                entity.HasIndex(e => e.Region)
                    .HasName("Region");

                entity.Property(e => e.CustomerId)
                    .HasColumnName("CustomerID")
                    .HasMaxLength(5)
                    .IsUnicode(false);

                entity.Property(e => e.Address)
                    .HasMaxLength(60)
                    .IsUnicode(false);

                entity.Property(e => e.City)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.CompanyName)
                    .IsRequired()
                    .HasMaxLength(40)
                    .IsUnicode(false);

                entity.Property(e => e.ContactName)
                    .HasMaxLength(30)
                    .IsUnicode(false);

                entity.Property(e => e.ContactTitle)
                    .HasMaxLength(30)
                    .IsUnicode(false);

                entity.Property(e => e.Country)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.Fax)
                    .HasMaxLength(24)
                    .IsUnicode(false);

                entity.Property(e => e.Phone)
                    .HasMaxLength(24)
                    .IsUnicode(false);

                entity.Property(e => e.PostalCode)
                    .HasMaxLength(10)
                    .IsUnicode(false);

                entity.Property(e => e.Region)
                    .HasMaxLength(15)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Employees>(entity =>
            {
                entity.HasKey(e => e.EmployeeId)
                    .HasName("PRIMARY");

                entity.ToTable("employees");

                entity.HasIndex(e => e.LastName)
                    .HasName("LastName");

                entity.HasIndex(e => e.PostalCode)
                    .HasName("PostalCode");

                entity.Property(e => e.EmployeeId).HasColumnName("EmployeeID");

                entity.Property(e => e.Address)
                    .HasMaxLength(60)
                    .IsUnicode(false);

                entity.Property(e => e.City)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.Country)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.Extension)
                    .HasMaxLength(4)
                    .IsUnicode(false);

                entity.Property(e => e.FirstName)
                    .IsRequired()
                    .HasMaxLength(10)
                    .IsUnicode(false);

                entity.Property(e => e.HomePhone)
                    .HasMaxLength(24)
                    .IsUnicode(false);

                entity.Property(e => e.LastName)
                    .IsRequired()
                    .HasMaxLength(20)
                    .IsUnicode(false);

                entity.Property(e => e.Notes)
                    .IsRequired()
                    .HasColumnType("mediumtext");

                entity.Property(e => e.Photo).HasColumnType("longblob");

                entity.Property(e => e.PhotoPath)
                    .HasMaxLength(255)
                    .IsUnicode(false);

                entity.Property(e => e.PostalCode)
                    .HasMaxLength(10)
                    .IsUnicode(false);

                entity.Property(e => e.Region)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.Title)
                    .HasMaxLength(30)
                    .IsUnicode(false);

                entity.Property(e => e.TitleOfCourtesy)
                    .HasMaxLength(25)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Employeeterritories>(entity =>
            {
                entity.HasKey(e => new { e.EmployeeId, e.TerritoryId })
                    .HasName("PRIMARY");

                entity.ToTable("employeeterritories");

                entity.Property(e => e.EmployeeId).HasColumnName("EmployeeID");

                entity.Property(e => e.TerritoryId)
                    .HasColumnName("TerritoryID")
                    .HasMaxLength(20)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<OrderDetails>(entity =>
            {
                entity.HasKey(e => new { e.OrderId, e.ProductId })
                    .HasName("PRIMARY");

                entity.ToTable("order details");

                entity.Property(e => e.OrderId).HasColumnName("OrderID");

                entity.Property(e => e.ProductId).HasColumnName("ProductID");

                entity.Property(e => e.Discount).HasColumnType("double(8,0)");

                entity.Property(e => e.Quantity).HasDefaultValueSql("'1'");

                entity.Property(e => e.UnitPrice).HasColumnType("decimal(10,4)");
            });

            modelBuilder.Entity<Orders>(entity =>
            {
                entity.HasKey(e => e.OrderId)
                    .HasName("PRIMARY");

                entity.ToTable("orders");

                entity.HasIndex(e => e.OrderDate)
                    .HasName("OrderDate");

                entity.HasIndex(e => e.ShipPostalCode)
                    .HasName("ShipPostalCode");

                entity.HasIndex(e => e.ShippedDate)
                    .HasName("ShippedDate");

                entity.Property(e => e.OrderId).HasColumnName("OrderID");

                entity.Property(e => e.CustomerId)
                    .HasColumnName("CustomerID")
                    .HasMaxLength(5)
                    .IsUnicode(false);

                entity.Property(e => e.EmployeeId).HasColumnName("EmployeeID");

                entity.Property(e => e.Freight)
                    .HasColumnType("decimal(10,4)")
                    .HasDefaultValueSql("'0.0000'");

                entity.Property(e => e.ShipAddress)
                    .HasMaxLength(60)
                    .IsUnicode(false);

                entity.Property(e => e.ShipCity)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.ShipCountry)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.ShipName)
                    .HasMaxLength(40)
                    .IsUnicode(false);

                entity.Property(e => e.ShipPostalCode)
                    .HasMaxLength(10)
                    .IsUnicode(false);

                entity.Property(e => e.ShipRegion)
                    .HasMaxLength(15)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Products>(entity =>
            {
                entity.HasKey(e => e.ProductId)
                    .HasName("PRIMARY");

                entity.ToTable("products");

                entity.HasIndex(e => e.ProductName)
                    .HasName("ProductName");

                entity.Property(e => e.ProductId).HasColumnName("ProductID");

                entity.Property(e => e.CategoryId).HasColumnName("CategoryID");

                entity.Property(e => e.Discontinued)
                    .HasColumnType("bit(1)")
                    .HasDefaultValueSql("b'0'");

                entity.Property(e => e.ProductName)
                    .IsRequired()
                    .HasMaxLength(40)
                    .IsUnicode(false);

                entity.Property(e => e.QuantityPerUnit)
                    .HasMaxLength(20)
                    .IsUnicode(false);

                entity.Property(e => e.ReorderLevel).HasDefaultValueSql("'0'");

                entity.Property(e => e.SupplierId).HasColumnName("SupplierID");

                entity.Property(e => e.UnitPrice)
                    .HasColumnType("decimal(10,4)")
                    .HasDefaultValueSql("'0.0000'");

                entity.Property(e => e.UnitsInStock).HasDefaultValueSql("'0'");

                entity.Property(e => e.UnitsOnOrder).HasDefaultValueSql("'0'");
            });

            modelBuilder.Entity<Region>(entity =>
            {
                entity.ToTable("region");

                entity.Property(e => e.RegionId).HasColumnName("RegionID");

                entity.Property(e => e.RegionDescription)
                    .IsRequired()
                    .HasMaxLength(50)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Shippers>(entity =>
            {
                entity.HasKey(e => e.ShipperId)
                    .HasName("PRIMARY");

                entity.ToTable("shippers");

                entity.Property(e => e.ShipperId).HasColumnName("ShipperID");

                entity.Property(e => e.CompanyName)
                    .IsRequired()
                    .HasMaxLength(40)
                    .IsUnicode(false);

                entity.Property(e => e.Phone)
                    .HasMaxLength(24)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Suppliers>(entity =>
            {
                entity.HasKey(e => e.SupplierId)
                    .HasName("PRIMARY");

                entity.ToTable("suppliers");

                entity.HasIndex(e => e.CompanyName)
                    .HasName("CompanyName");

                entity.HasIndex(e => e.PostalCode)
                    .HasName("PostalCode");

                entity.Property(e => e.SupplierId).HasColumnName("SupplierID");

                entity.Property(e => e.Address)
                    .HasMaxLength(60)
                    .IsUnicode(false);

                entity.Property(e => e.City)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.CompanyName)
                    .IsRequired()
                    .HasMaxLength(40)
                    .IsUnicode(false);

                entity.Property(e => e.ContactName)
                    .HasMaxLength(30)
                    .IsUnicode(false);

                entity.Property(e => e.ContactTitle)
                    .HasMaxLength(30)
                    .IsUnicode(false);

                entity.Property(e => e.Country)
                    .HasMaxLength(15)
                    .IsUnicode(false);

                entity.Property(e => e.Fax)
                    .HasMaxLength(24)
                    .IsUnicode(false);

                entity.Property(e => e.HomePage).HasColumnType("mediumtext");

                entity.Property(e => e.Phone)
                    .HasMaxLength(24)
                    .IsUnicode(false);

                entity.Property(e => e.PostalCode)
                    .HasMaxLength(10)
                    .IsUnicode(false);

                entity.Property(e => e.Region)
                    .HasMaxLength(15)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Tbluser>(entity =>
            {
                entity.ToTable("tbluser");

                entity.Property(e => e.Id).HasColumnName("ID");

                entity.Property(e => e.Email)
                    .IsRequired()
                    .HasMaxLength(20)
                    .IsUnicode(false);

                entity.Property(e => e.Firstname)
                    .IsRequired()
                    .HasMaxLength(20)
                    .IsUnicode(false);

                entity.Property(e => e.Lastname)
                    .IsRequired()
                    .HasMaxLength(20)
                    .IsUnicode(false);

                entity.Property(e => e.Password)
                    .IsRequired()
                    .HasMaxLength(20)
                    .IsUnicode(false);
            });

            modelBuilder.Entity<Territories>(entity =>
            {
                entity.HasKey(e => e.TerritoryId)
                    .HasName("PRIMARY");

                entity.ToTable("territories");

                entity.Property(e => e.TerritoryId)
                    .HasColumnName("TerritoryID")
                    .HasMaxLength(20)
                    .IsUnicode(false);

                entity.Property(e => e.RegionId).HasColumnName("RegionID");

                entity.Property(e => e.TerritoryDescription)
                    .IsRequired()
                    .HasMaxLength(50)
                    .IsUnicode(false);
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
