using Microsoft.AspNetCore.Mvc;
using NorthwindREST.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace NorthwindREST.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class CategoriesController : ControllerBase
    {
        private readonly northwindContext _context;

        public CategoriesController(northwindContext context)
        {
            _context = context;
        }

        [HttpGet]
        public IEnumerable<Categories> GetCategories()
        {
            return _context.Categories.ToList();
        }

        [HttpPost]
        public ActionResult CreateCategory(Categories model)
        {
            try
            {
                _context.Categories.Add(model);
                _context.SaveChanges();

                return StatusCode(200, new { message = "Category created!" });
            }
            catch (Exception e)
            {
                return StatusCode(400, new { message = e.Message });
            }
        }

        [HttpPut]
        public ActionResult EditCategory(Categories model)
        {
            try
            {
                _context.Categories.Update(model);
                _context.SaveChanges();

                return StatusCode(200, new { message = "Category updated!" });
            }
            catch (Exception e)
            {
                return StatusCode(400, new { message = e.Message });
            }
        }

        [HttpDelete]
        public ActionResult DeleteCategory (int id)
        {
            try
            {
                var category = _context.Categories.Where(x => x.CategoryId == id).FirstOrDefault();

                if(category != null)
                {
                    _context.Categories.Remove(category);
                    _context.SaveChanges();

                    return StatusCode(200, new { message = "Category deleted!" });
                }                

                return StatusCode(404, new { message = "Category not found!" });
            }
            catch (Exception e)
            {
                return StatusCode(400, new { message = e.Message });
            }
        }
    }
}
