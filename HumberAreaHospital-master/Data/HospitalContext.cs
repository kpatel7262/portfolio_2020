﻿using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;
using System.Security.Claims;
using System.Threading.Tasks;
using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.EntityFramework;
using HumberAreaHospitalProject.Models;

namespace HumberAreaHospitalProject.Data
{
    public class ApplicationUser : IdentityUser
    {
        public async Task<ClaimsIdentity> GenerateUserIdentityAsync(UserManager<ApplicationUser> manager)
        {
            // Note the authenticationType must match the one defined in CookieAuthenticationOptions.AuthenticationType
            var userIdentity = await manager.CreateIdentityAsync(this, DefaultAuthenticationTypes.ApplicationCookie);
            // Add custom user claims here
            return userIdentity;
        }
    }

    public class HospitalContext : IdentityDbContext<ApplicationUser>
    {
        public HospitalContext() : base("name=HospitalContext")
        {
        }
        public static HospitalContext Create()
        {
            return new HospitalContext();
        }
        //Anshuk Start
        public DbSet<Doctor> Doctors { get; set; }
        public DbSet<Speciality> Specialities { get; set; }





        //Madhu
        public DbSet<Job> Jobs { get; set; }
        public DbSet<Application> Applications { get; set; }

        //MarL
        public DbSet<Article> Articles { get; set; }
        public DbSet<Author> Authors { get; set; }
        public DbSet<Volunteer> Volunteers { get; set; }
        //Anshuk
        public DbSet<Question> Questions { get; set; }
        public DbSet<Survey> Surveys { get; set; }

        //madhu
        public DbSet<FAQCategory> FAQCategories { get; set; }
        public DbSet<FAQ> FAQs { get; set; }


        //Krishna Patel
        public DbSet<HomeRemedies> HomeRemedies { get; set; }
        public DbSet<RemedySource> RemedySource { get; set; }
        public DbSet<SocialServiceClubs> SocialServiceClubs { get; set; }

        //Cynthia
        public DbSet<Appointment> Appointments { get; set; }
        public DbSet<Staff> Staffs { get; set; }
    }
}