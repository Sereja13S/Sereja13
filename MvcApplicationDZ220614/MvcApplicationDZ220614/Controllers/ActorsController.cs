using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MvcApplicationDZ220614.Models;

namespace MvcApplicationDZ220614.Controllers
{
    public class ActorsController : Controller
    {
        private MoviesDBEntities db = new MoviesDBEntities();
        

        //
        // GET: /Actors/

        public ActionResult Index()
        {
            
            return View(db.Actors.ToList());
        }

        //
        // GET: /Actors/Details/5

        public ActionResult Details(int id = 0)
        {
            Actors actors = db.Actors.Find(id);
            if (actors == null)
            {
                return HttpNotFound();
            }
            return View(actors);
        }

        //
        // GET: /Actors/Create

        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /Actors/Create

        [HttpPost]
        public ActionResult Create(Actors actors)
        {
            if (ModelState.IsValid)
            {
                db.Actors.Add(actors);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(actors);
        }

        //
        // GET: /Actors/Edit/5

        public ActionResult Edit(int id = 0)
        {
            Actors actors = db.Actors.Find(id);
            if (actors == null)
            {
                return HttpNotFound();
            }
            return View(actors);
        }

        //
        // POST: /Actors/Edit/5

        [HttpPost]
        public ActionResult Edit(Actors actors)
        {
            if (ModelState.IsValid)
            {
                db.Entry(actors).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(actors);
        }

        //
        // GET: /Actors/Delete/5

        public ActionResult Delete(int id = 0)
        {
            Actors actors = db.Actors.Find(id);
            if (actors == null)
            {
                return HttpNotFound();
            }
            return View(actors);
        }

        //
        // POST: /Actors/Delete/5

        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            Actors actors = db.Actors.Find(id);
            db.Actors.Remove(actors);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}