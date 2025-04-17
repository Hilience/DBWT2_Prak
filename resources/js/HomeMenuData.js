export const menuData = [
    { title: "Home", url: "home" },
    { title: "Kategorien", url: "{{ route('verkaufen') }}"},
    { title: "Verkaufen", url: "createarticle"},
    { title: "Unternehmen", children: [
            { title: "Philosophie"},
            { title: "Karriere"}
        ]}
];
