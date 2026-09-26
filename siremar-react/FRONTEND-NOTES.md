<!-- /* // Manasa Mohan kumar (1001869268)
// K S Pavan Krishna (1001935714)
// Nishank Girish Gujar (1001861756) */ -->


Siremar


In the insoector dashboard, we are specifically showing the move outs for the county that the inspector is assigned to.

In the login page, the User can login in the same page irrespective of their Role because at the backend the page will know what his/her role is and show the Apt Dashboard Accordingly, for example, Either Admin or Inspector or Resident.

Link to the UTA Cloud Website:
https://mxm9268.uta.cloud/

We will be adding a Toggle for Dark and Light themed Website as well which is still under works.

<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/Hyc9tdbSGi4?controls=0&amp;start=11" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

We are also actively trying to include this media in the background in full quality but the server speeds of UTA and that of Youtube’s are very different.
We are working on fixing this.



Steps to run:
1. npm run i
2. npm run start



---

## About this archive

This repository consolidates **nine diverged working copies** of the SIREMAR
project that had accumulated on one laptop. Every copy shared the same git
history (`57194d6`, originally `gitlab.com/manasa2291/siremar`) but each
carried uncommitted work on top, and no single copy was complete — together
they held 334 distinct source files while the largest single copy had 228.

The merge kept, for every path, the most recently modified version. Where
copies disagreed (86 files), the April 2022 final submission won most of
them, which is the most developed state of the code.

Contributions to this tree, by source copy:

| Files kept | Original location |
|-----------:|-------------------|
| 175 | `Desktop/Hardisk/Downloads/siremar` |
|  73 | `Studies/WDM/Project docs/Final Submission (Code, PPT, SQL, Minutes)/siremar-react` |
|  45 | `Studies/siremar` |
|  20 | `Studies/siremar 2` |
|  10 | `Studies/WDM/Project docs/siremar_phase3` |
|   7 | `projects/Crypto/siremar-react` |
|   3 | `projects/siremar` |
|   1 | `final project/siremar` |
|   0 | `Studies/WDM/.../MohanKumar_Krishna_Gujar_Phase3/siremar_phase3` (fully superseded) |

### Not included

`src/images/margarita.mp4` (109 MB) is the background video used by
`LandingPage.js` and `Login.js`. GitHub rejects files above 100 MB, so it is
excluded. The app will not build without it — restore it to
`src/images/` or add it via Git LFS.
