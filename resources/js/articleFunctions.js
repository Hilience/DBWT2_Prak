export function getMaxPreis(data){
    let currentMax = 0;
    let currentMaxName = '';
    data.produkte.forEach(function(obj){
        if(obj.preis > currentMax) {
            currentMax = obj.preis;
            currentMaxName = obj.name;
        }
    });
    return currentMaxName;
}
export function getMinPreisProdukt(data) {
    let minObj = data.produkte[0];
    data.produkte.forEach(function(obj){
        if(obj.preis < minObj.preis)minObj = obj;
    });
    return minObj;
}
export function getPreisSum(data){
    let sum = 0;
    data.produkte.forEach(function(obj){
        sum += obj.preis;
    });
    return sum;
}
export function getGesamtWert(data){
    let gesamtWert = 0;
    data.produkte.forEach(function(obj){
        gesamtWert += obj.preis * obj.anzahl;
    });
    return gesamtWert;
}
export function getAnzahlProdukteOfKategorie(data, kategorie){
    let artikelId;
    if(!data.kategorien.find(function(value, index){
        if(value.name === kategorie)
            artikelId = index;
        return value.name === kategorie
    })) return 'Die Kategorie ' + kategorie + ' existiert nicht.';
    artikelId = data.kategorien[artikelId].id;
    let anzahlProdukte = 0;
    data.produkte.forEach(function(obj){
        if(obj.kategorie === artikelId)anzahlProdukte++;
    });
    return anzahlProdukte;
}
