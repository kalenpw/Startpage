using System.Text.Json;
using System.Collections.Generic;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace Startpage.Pages;

public class IndexModel : PageModel
{
    private readonly ILogger<IndexModel> _logger;
    public string Message { get; set; }
    public List<QuickLink> QuickLinks { get; set; }
    public List<FrequentLink> EntertainmentLinks { get; set; }
    public List<FrequentLink> TorrentLinks { get; set; }
    public List<FrequentLink> MiscLinks { get; set; }
    public List<FrequentLink> MoneyLinks { get; set; }

    public IndexModel(ILogger<IndexModel> logger)
    {
        _logger = logger;
    }

    public void OnGet()
    {
        var quickJson = System.IO.File.ReadAllText("./Data/quick_links.json");
        QuickLinks = JsonSerializer.Deserialize<List<QuickLink>>(quickJson)
            .OrderBy(w => w.Hotkey).ToList();

        var frequentJson = System.IO.File.ReadAllText("./Data/frequent_links.json");
        EntertainmentLinks = JsonSerializer.Deserialize<List<FrequentLink>>(frequentJson)
            .Where(w => w.Category == "Entertainment").ToList();
        TorrentLinks = JsonSerializer.Deserialize<List<FrequentLink>>(frequentJson)
            .Where(w => w.Category == "Torrent").ToList();
        MiscLinks = JsonSerializer.Deserialize<List<FrequentLink>>(frequentJson)
            .Where(w => w.Category == "Misc").ToList();
        MoneyLinks = JsonSerializer.Deserialize<List<FrequentLink>>(frequentJson)
            .Where(w => w.Category == "Money").ToList();
    }
}
