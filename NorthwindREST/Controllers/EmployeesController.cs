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
    public class EmployeesController : ControllerBase
    {
        private readonly northwindContext _context;

        public EmployeesController(northwindContext context)
        {
            _context = context;
        }

        [HttpGet]
        public IEnumerable<Employees> GetEmployees()
        {
            return _context.Employees.ToList();
        }

        [HttpGet("{id}")]
        public ActionResult<Employees> GetEmployeeById(int id)
        {
            var employee = _context.Employees.Where(x => x.EmployeeId == id).FirstOrDefault();

            if (employee == null) return StatusCode(204, new { message = "Employee does not exist!" });

            return Ok(employee);
        }

        [HttpPost]
        public ActionResult CreateEmployee(Employees model)
        {
            try
            {
                _context.Employees.Add(model);
                _context.SaveChanges();

                return StatusCode(200, new { message = "Employee successfully created!" });
            }
            catch (Exception e)
            {
                return StatusCode(400, new { message = e.Message });
            }
        }

        [HttpPut]
        public ActionResult EditEmployee(Employees model)
        {
            try
            {
                _context.Employees.Update(model);
                _context.SaveChanges();

                return StatusCode(200, new { message = "Employee successfully updated!" });
            }
            catch (Exception e)
            {
                return StatusCode(400, new { message = e.Message });
            }
        }

        [HttpDelete]
        public ActionResult DeleteEmployee(int id)
        {
            try
            {
                var employee = _context.Employees.Where(x => x.EmployeeId == id).FirstOrDefault();

                if (employee != null)
                {
                    _context.Employees.Remove(employee);
                    _context.SaveChanges();

                    return StatusCode(200, new { message = "Employee deleted!" });
                }

                return StatusCode(404, new { message = "Employee does not exist!" });
            }
            catch (Exception e)
            {
                return StatusCode(400, new { message = e.Message });
            }
        }
    }
}
