export const menuData = [
    { title: "Home", url: "home" },
    { title: "Kategorien"},
    { title: "Articles", url: "articles"},
    { title: "Verkaufen", url: "verkaufen"},
    { title: "Unternehmen", children: [
            { title: "Philosophie", children: [
                    {title: "Unsere Ziele"},
                    {title: "Nachhaltigkeit", children: [
                            {title: "Go green Kampagne"},
                            {title: "Grüne Arbeitswege"}
                        ]}
                ]},
            { title: "Karriere", children: [
                    { title: "Job-Angebote" },
                    { title: "Ausbildung" }
                ]}
        ]}
];
