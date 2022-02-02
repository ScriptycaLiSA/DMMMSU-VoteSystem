@extends('layouts.logged_in')

@section('title', 'Webmaster Panel')
@section('content')
<div class="relative">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-gray-900 opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">

            {{-- Container for image and name placeholder webm --}}
            <div class="flex items-center justify-center mt-10 bg-green">
                <div class="flex items-left">
                  <div class="relative shadow mx-auto hll-24 w-24 -my-12 border-white rounded-full overflow-hidden border-4">
                      <img class="object-cover w-full h-full" src="https://scontent.fmnl25-1.fna.fbcdn.net/v/t1.6435-9/188390088_4237818132949817_1445088910336767925_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeGientYW3iMPbGyVXOu6cm25yq15sX8_9znKrXmxfz_3KvGnCj5OjJ5vQwhYkHqi0qBnDDRpxETMZqQ8IreMMWf&_nc_ohc=ONQj3ZF4yFkAX8nFzzh&_nc_ht=scontent.fmnl25-1.fna&oh=00_AT-ZGw_igKYHg7pUxmkMaMSAGeyTDUcJFw71FdINgwNr8g&oe=621CFCAB">
                  </div>
                </div>
                <div class="mt-auto">
                  <h1 class="text-lg text-center font-semibold">
                    Superadmin
                  </h1>
                  <p class="text-sm text-gray-600 text-center">
                    Organization | Name
                  </p>
                </div>
            </div>

            <div class="flex items-center justify-right mt-2">
            <nav class="mt-10">
                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                    <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAA+0lEQVR4nO2ZUQqCUBQFD324qLD1ZQvVbdTPy0SSEHrOA2dACoLOMH3FTUTedEkeSaYkz0rPmGQoW63tZ6g4vH6GBvczlg+v3z78E30+v0Rr+3Od2mztIPuXAwabxgC0AI0BaAEaA9ACNAagBWgMQAvQGIAWoDEALUBjAFqAxgC0AI0BaAGaZYCpvPYV926rrSX0/qGHiXuD++mKxLjzy/Y8v05j5L6InBz6Pk/v4/d5eh+/z9P7c53abO0g+/4XoAVoDEAL0BiAFqAxAC1AYwBagMYAtACNAWgBGgPQAjQGoAVoDEAL0Bhg8Z6+z9P7+H2e3sfv8/S+nJIXmkLImDnbzzAAAAAASUVORK5CYII="/>
                    <span class="mx-3">Dashboard</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                    <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAFbklEQVR4nO3bW4xdYxQH8N+Yjoh2pNoatA86gjaq0iCqJOraxi1udUmINB4IkYZIJaSIRFxaBA9CpaTiTlHBg2gR+sBT69Io4l7UvRJttdXjYe2dOe1cztn77H1OZ/gnOzOz97fWt9Z/f5e11renXevRhiMxHXtjLf5pqUVNRDfeQ6XqWosZrTSqWTgQ3+F3XIFDcBZWYzPObp1p5SN1/idM3uHZcLxlCJMwkPMphiwJ9TifYsiRkMX5FEOGhDzOpxj0JDTifIpBS0IRzqcYdCSkzq8Te3wR6MQKQcJJBeksBWU4n6ITn+BrdBSsuxCU6XyKC0XYfHRJ+nOjGc7DNEHAGSX2kRlj8JXynYd5goADSu4nE+ZjK44quZ9p2IBXSu4nM1bhjZL7mIb1YhHsKrmvzFiDF0vUX+38viX2kxuPi9x+nxJ07/TOE5HeRryLEQXqrXZ+bIF6S8G5Ikp7RzEkDCrnU5wjSFghora8SJ1fYxA5nyIdCXlJaJrzbQM8G4XrcapY2AZq2xc6MQx/CTKyYISI8zfg74yyKSr4Ea/hNrFA90J/TnWJt9eNZSLCG4wYjxPxBY7Bz/UKLhJvbXo5djUVxwlfHs4itB6LSzGnNXhMP1Nglz7u7Y49xAHFUMHHGCl82w59EZCuC9vKtKjJSH3pteb1RcB/Cv8T0Me9zeJ4ush4vtUYIWoVdccjH4pj66EwQnbB+6JeUTcuEZHUYuxXglHNwnixBVZwcVbhm8SQqQzya7OoIfaJWvH9aaL29iy+rNF2Z0M3zhc+vJZXSVp+nlmQUc3ETGH7tIEaDWuOLX2iQ6S6m/CnqCY1Hc1e5SfhDpHnbxBZ5o8iZV6JBZpc62/WCOjC7Zgt9uM38QS+T56PE8dcc3C1KLBegz+aZF+/KGINmIRvxBCfLwot/WG0GAUb8TkObaDfutaAWtgTz8tfip6A3/AtDssgd4Se7wr2z9l3IQS0iYJCew7Z4fhInBWOzyHfLSo4q7FbDvlCCJiSKMlTGZon0tDj62zfJub9pyIUP0d8BFHBdTn6L4SAyfKdw3eKof9Cne3bcH/S13IRt2/BQXhJVHN6FTNqoBAC4GDZK8Kzks6PraNttfPzk3sTk78vFVOwgjMz2lAIAV3ilCdrQrRQzN907ZiMJ7FUhKYpqp1fUHXvgeTekWKr/hUPZrShEALyboPLxBkhcabwm1gM14h14Sr9O39vcu/OKn0r8HpGG1pKwCosSX6/KNExRYS/SwQJb+nt/H3Jvbt30LcEH2S0oS4CygqFN+o5Elub/JwhFrYL8YiYFrdgrp43Pwf34Nod9HWKfKHpyDsCnhUnuimeFm/9yj7aDvTmU6zBMxltaOkUmJvIpQFQh/h6ZEcSqp2/qx9d3cnzORltaCkB+ydy1ZWYahJuFWd1abmqP+fhxkQm607UUgLgZZHNjam614GHhENpueqGAXTsleh4Lkf/LSdgonDwVb1ziW6cbODvidpFKWuT+AAzKwohYGqi5JSc8pcl8otk+653V7FTVEQNIQ9OSeSn5pRHz1y+pAEdN4sh/7YIq2thkog+txl4etTCbNsvxLnQIebgwkaU4AKR0GwVW+IsUQ9sT66xOC95tlWEvrMa7HORiEAbrno9Jr4XGFOrYQ2MEvXAdXpq9luTK/37h6TNyAb76hKB06O1GtaT5U0QhY2l4i1VGjItos+pIhIcq+e/RT8SR1iNHsu3idD5dDGdPmtQHyIIqYiMbmc+NO3EU8LWq+oRyJLnXysytF/EXr5cVHVb/Y/O7aKqfAIuF4XV60ROUTgOF3tz9bzdWa4tiW1Ziq+ZKz0pRov0dpx8BcsisUmsISvF7pEJ/wI/mcI3qtzB0AAAAABJRU5ErkJggg=="/>
                    <span class="mx-3">Votes</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                    <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAABmUlEQVRYhe2WzUrDQBSFv7pQxAoKWh9Bt6LoslbElWhbFV9DRSnqSrvyZ6ErfQp/36O6VWrxASpolUK1bVzMDYFI4ySZLIQcuARmzj3nJnPvEIgR4x8iBRSBe+BTogQcAMNRm68ANcDqEO9APkrzthhdAWmgT2IGuJa9FpAzbZ7CefNtD15BOG/AkMkCijhv/hduhbtvsoAHEU1rcDPCLZks4ENEkxrcfuHWdIS7NAtoavIAEn5ydAuoyHNSg2tznk0WcCnPdQ3uhivHCEaAV9TZFjx4O8KpokbXKHKoc7VQo5ZBNWUSmAXuZK8JZE2b21hG3XSdruKWcCLBIlD2MLejDCyYNE4Axy6TF2AU6JUYkzV7vw0c4oxkKJyI6Dewi9OMp6jmHAHOcJpvT7gWcBTWPCtCX8CcrOWBBr8/fQOn+eYlxwKWgpr34HzWTdfeNGoSqhI3wJSLsyW5FaA7SAFrIvBIsLNMAE+isdqJ5HUT2j8V5yLiFxZw4dLyhYqIjAdJFkzgjKZv1CV5IEQBg6JRD6ERI0a0+AG51oK4HStRGQAAAABJRU5ErkJggg=="/>
                    <span class="mx-3">Register Voter</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                    <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAD8UlEQVR4nO2bSWgUQRSGvzHJJEYQBVHw4IKC4q6JJyXRUw7ixbuoVxE9eXABb+4xIrgFVBSjibjvICJeVET0ogiKCGqMOQRxw+zxUBl8XaleJunq6uj8UEzT79V77/+nq6e6qqeIfxsZYCYwBxgFtAF9TitKCBlgPfABRTjXvgCbgWJ3pdlHCXAeL3G93QWyYYGqgSagGegOCWirdQJ78iR/WYvxDXjW/ynP1wYFOe6IsKn9GAL5eqC8314OnBK2DmCCKVCayHcAuyKQzwJXtL77fER6KXxW6w7VWpCrQAURxotDRCWfQ53w26Ybm/CSTzuyqDqjkgc4K3w36sZmYayIs1ILyALXyI/8TOC38K/UHeTdPu2Xfb7kpwDvhf9j1HzBAxkwrcgC1/HWuj+kj07+OzDL5Jh2AeIg3wes9HNOswClwA2GTr4PNR8wIq0CxEG+Sxx3A1NNndIoQClwk6GR/wksA56LcxtMHdMmQFzkq/ttO8X5g6bOaRLA9FN3IKTPJOCd8P8FLBd2OQs0PmSlRYBS4BbxffMAI4E3wr7WFCQNApQBt4mXfAY4qdnHmQK5FsAW+WNazAEPQTm4FKAMuIN98heAEX4BXQmQJf4x70e+JCioCwGK8D6G2yLfSITFUBcC1Gp5D4X4m8hXCbuJfANK6FAkLcA6Lec5AsYngyN/hojkIVkBZqAmKrl891G//34Im+RkgMMMFDSvPYCkBCgGnohcb4HRAf5h3zzAVrz1nyD4ajIiKQG2izztBC+/TSOcPHiXxOsZBHlIRoCFqA2PXJ5NAb6VqO2sMPKghtQlYAuGpa6oSEKAByLHA/yLrUFtiuR8v+NPPjbYFqBGxO8C5hl8MqirQl4ln4FFlmrywKYAGbw3vjqDz3gGTodfAZMt1GOETQFWidhfgTHClgHWAK1aDQ+BsRZq8YVNAZ6K2LvF+QrgkZa7C9hBvPv4e1E30cDdZlsCzBFx24GJwALURKVHy/saw45NDOjoj98R5GRLgP0i7gvUOO/V8nWilrxGxpw7h0jcbAhQDLRosWXrQT2mTo8xpwnOBFiBmXgvalt7doy5gmDklsTLQvpdvA04jXoR400C+QORhAAXUTe80ai9/Huou3wqoE9D+wJswx1GboN6YvqXUBDAdQGuURDAdQGuURDAdQGuURDAdQGuURDAdQGuURDAdQGuoQvQI47T/LJ0vpBcJMcBArSK47nWykke88VxS5BjI3+XjW7YrChhyH+UNAQ5VuFdO7sOLGZ4Docsqnb9HeOlYR2P4r+CO9zb4SjKlQBHUlCsDfJ5rYEuRf0D8xPu/jg5lNYNfETtPi3Jh3gBBfxH+AO4CP0xEnmpyAAAAABJRU5ErkJggg=="/>
                    <span class="mx-3">Create Elections</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                    <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAC+UlEQVRoge3YS4hURxQG4G8yOtGoUREDGnyTjS5iCIQsxFFCkKARNz4iCoMh2bp070Jc6lIhKEqCj1XIg+wiOqgkGVAUwRF8xQeOooaZkYkOJouqxurWdvr23Olum/7hQFX999Q5595Tj3NpoYUWWsgJW/FfiQxjaZ5G3spzsjKYgT1oS+QUpuVppBaB1ATjamRnNd5P+kvwPE8DtQrkCo4n/R9wNk8DtQqkV3Egbxw+wh+4jBV19qUqzMJ3uINvsB7XhK+yoI5+VYwObMd97MXUV3APIvduzb2rEF/iKn7Cotc8Nxv78De+1UBHwMc4iR50ZtTrxl9YNgZ+VYz3cAi30KW6N9uGLcLXORznrDl24Rgm5zDXpDjXrmonGE1+jsOfGBjFHAUMxrmqPtcaZqGNFk0TyEhY5+Vaol6y7nWOjvRFpuGg4lqiHnLQCPVL06RW1l2iDfMUv4BHUQg1x9sJN4C+2J6JKQn3VDiDCFeZGQn3HDeElKoIWQP5UKgjbsf+RFzAKkzAddyMXHuUObHfHZ8Zjv25wgH4SEidT/EkcrPxGU5X6ljW1OrAeeEutQib41jB8X8T7pOEK+h2JvxDjE+4rxPubIlu7oE0LJomkGquBHOwO7bnlnAdCffOK3R34J/YLr2jdWF5bC/M6lT7CPxSzMePsf9YWAfPMIR7wmXvahy7L+w0Q+jHEVyMureFDBiK8itORO5uCXcGv0RbhMPwBs5lDbCALhyoVjlHHBB8KYusqTUdOxXvKN1CLQFrhX9YleBnoZqETViZcM+inb5SpXLIutg/wBqhGuwR0mdbwm8Q0rUnkelCzqdj7diY6G0V0qjAf47FWRyrZrH3YX9srxBK1hS/4/ukP1k48fcnY4P4okTvN2HdwFdZnWqa7bdpAsmaWgPC38OHif6J8o9XjH4cFRY5IR37s0yQNZBLwi011cujZt+i+GY8bIwDkdVAhRj2ohSoCk2zRlqBNBqaJpBy6FX/3z/lpHcM426hhRYaHf8D6STVhnv700QAAAAASUVORK5CYII="/>
                    <span class="mx-3">Colleges</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
                    <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAFjklEQVR4nO2b328VRRTHP22pRVsoVmxiS42/ffAf8MEWapqK1aqVKPpCjC9GaTC+SFFBI8T6g0Rjov4FPKjoA0YTrUICNlIgIvJQAtZGJEKpFagmoqLXhzmT2bt3Zu7ee3fvLqXfZBJ6zpmzZ747c2bO7AXmcWmjporPqgO6gAHgNuBGoAOoBaaAn4D9wOfACHC+irEliiuADcApIBexTQNbgCUpxBsrHgROYAZ2BNgM9AI3AJcDVwLXi+w14BD5RDxS9ahjQB0wDPyHGsgYsKKE/iuBUQwR7wILYo4xMdQA21CB/w2spbxcUwM8A/wjvrZzkZDwOirgs0BnDP46gTPi870Y/CWKAVSg54Fuh00DsA7YC/whbS8wCFzm6NODmk054NEY440VTcBxVJBPOmzage9wZ/+DYmPDU2IzhUqcmcOLqAC/Qe3tYTRgBn8cWAUskjaA2iFywLfYZ0ItcEBsXo459opRB/yMCq7LYbMOM/gWi74l4GOtw0e36H/FvVz6gV2Y5bUTuLfoCCp01CeBjXv8jYnNKo/NQ5hZ5IKeKf0W3Su4l9cWj8+KHb0huo0en7+LzSKPzWKxmfXYvCo2b4fk/SL/C3gWaJO2XmQ5Is6Echx9KfK7PX41Ab4E1kJxAnrEZjQk3yXy9ZY+Q6L7yuO3Ikf6nO/K4KC2uhxqmrvwMMWXwC1icyok1wS3Wfq0UZzYihz9KfJmj99BsZkAllr0S4Ef8SdBUEtInzWCOOeJux1zOCuKchzppeFb3w2oLS4HTAKrUYQ1owqeSdEdwJ3hARqxE6CX4ZClzwbRfeHxW5GjkyK/1uGzHngac6T1tTNiW+/wdZ3YnQzJV2Jy1xDqBbZLzPoF9Tp8VuxoD+6tqRV10aEHOILaLUZRM+ms/Huj6LTdPukbxl2i/9qi24qb2K1Fxl2Ro7dEtzkk7wCOie4o0YqjzlCfZSG93qKHQ/L7gNOeuE9jf0EFKMeRfisTmNJ3Aeot5VAzZHGUhwuaMfcBu1EnTcT3uMhvD9j3ARdEvgN199AorRv4RHQX8G/VZTuqB34RXY/IdL44SuHu0IGq72elfQzcGrJZAvxA/pbcK3+fwNQbV6GWUU6e6cLzmARuO4pX7OgFkR9EVYbTqBuhO0L9O4AZCmfWDIXTfTlm1jVicsmgJZ4dnpg19At8zjewch01YWaBToojlr4fiu5T1ICXAZ+J7AOL/c6Qzwnyt0ldY0S5crtTbMdsyjgcPUD+W33M0ndWdMG33SGycxb7xwP+/kXtUkHo2dQUIW59iJqxKeNy9GYg4Psteq2LKh8I6GxT19XPBad9XI5qUVM5hzoiP0H+pWhUAvSlqD57bMN+uZo5AkBtW+8EbHZjLkqiENCFWfM51EWr7ZYp2K/UlpyjAFaT/0XocAQCgjbHUXnFB33WKKXtSdRRCM3ASxQersII6qaATUTLRxcN6oF7KE5AH+5CaE6g1F0gUbgSyyWDLBLwPvAb6lC0HbgJuBn4CHWIcsldNUXmECUJBtu0tKhyW02RKRQjwFYjlCq31RSZQTECbDVCqXJbTZEZlLoLxCW3IotJsKqYJyDtANJGnAQsRJ3fj6F+zTGJurn1fSyZM1hIfvkabIfIv9/PVBKMC5sw5WsvqopbgfmWfxhDQtIBpkKA/pAR/mLUiqnvNQlzkgDfx9EwCXOSAP1ld7lDHyRhThIwLA89gv2DJhSSkBRSIaAJ8xO4YMILoxX1SxHbB5O4kAoBAFcD38vDx4Fr0giCFAmAbJCQKgGQPgmpEwDpkpAJAsB+CEoadWSIAKg+CWswsy4zqCYJ+uczaxJ8RlmoFgl6+tcVM0wDQRL2J/SMTK1/G5KuBkv2Xc3/OapRjTcUeVxp3AmGf+YeN2y/IJ3HPBz4H8Pyzs6RdXo7AAAAAElFTkSuQmCC"/>
                    <span class="mx-3">Candidates</span>
                </a>
            </nav>
          </div>
          <div class="flex items-center justify-right mt-2">
            <nav class="mt-6">
            <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="">
              <img class="h-6 w-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAADlElEQVRoge3bTYxlQxTA8V8bo5HMDCOI7vExZswGEdGCYZiFbx2xwCST2A5LFlY2EmlsbIjExkZCQkRiQYiPidC+LYiFZAzx2UMi0cMk3aK1RdWT56q63ffm9nt92/0nN/X6Vp165/S9deqcOt2UcwXewxwWV/k1F3W9bgmbstyMhVVgSNVrAZNVjV2PmTjBA9hYdYIhsBFTgs4/CDYsm4ui4AGMNK7ayjGCLwXdL0wNOCojuCG230fhtrCI7+LnTakBOYPXLHUMPgn3YHNirjtxfkJmEjfV+K7GObqGzD48iFE83Hf/EjyBV3F9Qeb52B6bmXNdlD0r0/817sJf2ILH8QYerah7LYNHY1tUfrTQpvpybMAdJePmcC9mcZ6wZZ5sQAZ/hMP4sHD/AA5hOiHzjnLn9yvOxdZM/1eCsfAKJoSn3hi7BQX3NznpgNgv6L471ZlzWl8Iv9U3V0ipoZF7pQ9h2yAVaZCeH/hzqFoMiDNxRPDmp6UGLOW0RnAtLhA8aaX4dMAch9txPF4QcoFKnCh4xGFnP1Wvt/w3KPqHsif8mJBbzuA5YS9czcziY7yuRvw/LqyD33FGs3oNl9y2dLawfj/Ft4NTZ+XJGbwutn8MSpEG2YX7VXSwbY60XhN0vzzVWSeWnsTT2IuX+u6P4xM8ifsKMtOCT9hVMu925dnSwb6fe7H0L4mxPZuST7iOwRPC+dHF/m3wOTgVOxMyqXv9nIDP5bOl+Tj3LG7Ay3gfly1b60gdg+djW9ym5gttsa9sq/gNT8lnSwfjGPgMLwrbT2OUreHNuFv6xGOfkOYVuVF4MoOgNFvK0WanVSs9XLPkDD4c2y3ady59evw8WzawyHr8JLwaU9pRedgkHC4uCvF/ZYe8R0iih5391Kkt3ZozqmwNP4sr8a70VrOaadMyrE1/MW3G6j6saIzaxbS2UruYNoZvhDRrTZEzeIdw0nFVoq8rpkW6YlqiL0dXTCvQFdNK6LKlfnIG9wpRxwxKkQapVUwbEzziEe06iK9dTPtRODe6BR/gGfy8Ago2ySnCSWrtYto27UwPaxfTHhECgq6Y1mZyXnqr/1kxrfeqt7GYVspaDDweEg4gx1KddQyeFBxEMd0bF2LpqYTMNN5eYt7tuDpzFf+iaEJIU1NcKmxRO1KdXTFtGXTFtEhXTBsSXXrYT1dMi3TFtBZdC7itqrE9dgpBQ1v+FW8a15QZ9DejWB72kNvQTQAAAABJRU5ErkJggg=="/>
              <span class="mx-3">Update Master List</span>
            </a>
          </nav>
          </div>
        </div>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-blue">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

                    <div class="mt-4">
                        <div class="flex flex-wrap -mx-6">
                            <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">%data</h4>
                                        <div class="text-gray-500">New Users</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">200,521</h4>
                                        <div class="text-gray-500">Total Orders</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor"
                                                stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                            <path
                                                d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                stroke="currentColor" stroke-width="2"></path>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">215,542</h4>
                                        <div class="text-gray-500">Available Products</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">

                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
