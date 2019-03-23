export function alphabeticalSort(a , b){
    if(a.name.toLowerCase() < b.name.toLowerCase()){
        return -1;
    }
    else if(a.name.toLowerCase() > b.name.toLowerCase()){
        return 1;
    }
    return 0;
}