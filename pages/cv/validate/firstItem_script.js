// Click on show!
Array.from(navLinkA).forEach((nav, idx) => {
  if (idx !== 0) {
    nav.addEventListener('click', () => {
      if (firstClickFlag[idx] === 0) {
        document.getElementById(`add-${addBtnList[idx-1]}`).click();
        firstClickFlag[idx] = 1;
      }
    })
  }
})