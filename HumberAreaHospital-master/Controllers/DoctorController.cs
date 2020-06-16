﻿using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using HumberAreaHospitalProject.Data;
using HumberAreaHospitalProject.Models;
using HumberAreaHospitalProject.Models.ViewModels;
using System.Diagnostics;
using System.IO;
using Microsoft.AspNet.Identity;
using PagedList;

namespace HumberAreaHospitalProject.Controllers
{
    public class DoctorController : Controller
    {
        //create db context
        private HospitalContext db = new HospitalContext();
        // GET: Doctor
        [Authorize]
        public ActionResult List(string searchBy, string search, int? page)
        {//This method is used to list all the doctors and has the search and pagination functionality
            
            if (searchBy == "First Name")
            {
                return View(db.Doctors.Where(x => x.DoctorFname.Contains(search) || search == null).ToList().ToPagedList(page ?? 1, 3));
            }
            else if(searchBy=="Last Name")
            {
                return View(db.Doctors.Where(x => x.DoctorLname.Contains(search) || search == null).ToList().ToPagedList(page ?? 1, 3));
            }
            else
            {
                return View(db.Doctors.Where(x => x.Specialities.Name.Contains(search) || search == null).ToList().ToPagedList(page ?? 1, 3));
            }
        }
        [Authorize]
        public ActionResult New()
        {
            //This method needs the list of specialities
            string query = "Select * from specialities";
            List<Speciality> specialities = db.Specialities.SqlQuery(query).ToList();
            return View(specialities);

        }
        [HttpPost]
        public ActionResult New(string doctortitle, string doctorfname, string doctorlname, string speciality)
        {
            //This method add the new doctor to the DB
            string query = "insert into doctors (Title, DoctorFname, DoctorLname,SpecialityID) values(@doctortitle, @doctorfname, @doctorlname,@speciality)";
            SqlParameter[] parameters = new SqlParameter[4];
            parameters[0] = new SqlParameter("@doctortitle", doctortitle);
            parameters[1] = new SqlParameter("@doctorfname", doctorfname);
            parameters[2] = new SqlParameter("@doctorlname", doctorlname);
            parameters[3] = new SqlParameter("@speciality", speciality);
            db.Database.ExecuteSqlCommand(query, parameters);
            Debug.WriteLine("The new record being added has firstname:" + doctorfname);
            return RedirectToAction("List");

        }
        [Authorize]
        public ActionResult View(int id)
        {
            //This method will use a viewmodel. It needs a particular doctor and list of similar doctors.
            Debug.WriteLine("I am trying to view record of doctor having id:" + id);
            string query = "Select * from doctors where DoctorID=@id";
            SqlParameter parameter = new SqlParameter("@id", id);
            Doctor selecteddoctor = db.Doctors.SqlQuery(query, parameter).FirstOrDefault();
            var speciality = selecteddoctor.SpecialityID;

            string secondquery = "Select * from doctors where doctorid!=@id and Doctors.SpecialityID=@speciality";
            SqlParameter[] parameters = new SqlParameter[2];
            parameters[0] = new SqlParameter("@id", id);
            parameters[1] = new SqlParameter("@speciality", speciality);
            List<Doctor> similardoctors = db.Doctors.SqlQuery(secondquery, parameters).ToList();

            var ViewDoctor = new ViewDoctor();
            ViewDoctor.doctor = selecteddoctor;
            ViewDoctor.similardoctors = similardoctors;
            return View(ViewDoctor);
            /*Select * from doctors where doctorid!=1 and Doctors.SpecialityID=1*/
        }
        [Authorize]
        public ActionResult Update(int id)
        {
            /*this method is used to show the base info of an individual doctor and also gives the user to select a speciality.
             Hence, We need a ViewModel*/
            string query = "Select * from doctors where DoctorID=@id";
            SqlParameter parameter = new SqlParameter("@id", id);
            Doctor selecteddoctor = db.Doctors.SqlQuery(query, parameter).FirstOrDefault();

            string secondquery = "Select * from specialities";
            List<Speciality> selectedspeciality = db.Specialities.SqlQuery(secondquery).ToList();
            var UpdateDoctor = new UpdateDoctor();
            UpdateDoctor.doctor = selecteddoctor;
            UpdateDoctor.specialities = selectedspeciality;
            return View(UpdateDoctor);
        }
        [HttpPost]
        public ActionResult Update(int id, string Title, string DoctorFname, string DoctorLname, string SpecialityID)
        {
            //Method to be used once the user clicks update
            string query = "Update doctors set Title=@Title, DoctorFname=@DoctorFname, DoctorLname=@DoctorLname, SpecialityID=@SpecialityID where DoctorID=@id";
            SqlParameter[] parameters = new SqlParameter[5];
            parameters[0] = new SqlParameter("@Title", Title);
            parameters[1] = new SqlParameter("@DoctorFname", DoctorFname);
            parameters[2] = new SqlParameter("@DoctorLname", DoctorLname);
            parameters[3] = new SqlParameter("@SpecialityID", SpecialityID);
            parameters[4] = new SqlParameter("@id", id);
            db.Database.ExecuteSqlCommand(query, parameters);
            Debug.WriteLine("The record being updated has firstname:" + DoctorFname);
            return RedirectToAction("List");

        }
        [Authorize]
        public ActionResult Delete(int id)
        {   //To show base info of a doctor
            Debug.WriteLine("I am trying to view record of doctor having id:" + id);
            string query = "Select * from doctors where DoctorID=@id";
            SqlParameter parameter = new SqlParameter("@id", id);
            Doctor selecteddoctor = db.Doctors.SqlQuery(query, parameter).FirstOrDefault();
            return View(selecteddoctor);
        }
        [HttpPost]
        public ActionResult Delete(int? id)
        {   //to be executed once the user clicks delete
            string query = "Delete from doctors where DoctorID=@id";
            SqlParameter parameter = new SqlParameter("@id", id);
            db.Database.ExecuteSqlCommand(query, parameter);
            Debug.WriteLine("The record being deleted has an id of:" + id);
            return RedirectToAction("List");
        }
    }
}