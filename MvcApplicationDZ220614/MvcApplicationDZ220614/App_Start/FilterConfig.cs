using System.Web;
using System.Web.Mvc;

namespace MvcApplicationDZ220614
{
    public class FilterConfig
    {
        public static void RegisterGlobalFilters(GlobalFilterCollection filters)
        {
            filters.Add(new HandleErrorAttribute());
        }
    }
}