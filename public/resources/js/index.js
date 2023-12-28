
const getUrl=async(e)=>{
    const copyElement = document.querySelector('#url-result')
    try {
        await navigator.clipboard.writeText(copyElement.innerHTML);
        console.log('Content copied to clipboard');
      } catch (err) {
        console.error('Failed to copy: ', err);
      }
}