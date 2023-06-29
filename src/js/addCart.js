const handleUpdateItem = (item, action) => {

    console.log({ item });
    let newQuantity = item.quantity;

    if(action === 'increase'){
        newQuantity += 1;
    }
    if (action === 'decrease') {
        if(newQuantity === 1){
            return;
        }
        newQuantity -= 1;
    }


}