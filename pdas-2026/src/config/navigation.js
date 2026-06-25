// src/config/navigation.js
const base = import.meta.env.BASE_URL.replace(/\/$/, '');

export const navLinks = [
  { name: 'HOME', href: `${base}/` },
  { 
    name: 'ABOUT PDAS 2026+', 
    href: '#',
    dropdown: [
      { name: 'Exhibitor Profile', href: `${base}/exhibitor-profile` },
      { name: 'Visitor Profile', href: `${base}/visitor-profile` },
      { name: 'Who Should Participate', href: `${base}/who-should-participate` },
      { name: 'Why To Participate', href: `${base}/why-to-participate` },
      { name: 'Participating Options', href: `${base}/participating-options` }
    ]
  },
  { 
    name: 'KEY HIGHLIGHTS+', 
    href: '#',
    dropdown: [
      { name: 'Expo', href: `${base}/expo` },
      { name: 'B2B & B2G Meetings', href: `${base}/brb-b2g` },
      { name: 'Strategic Panel Discussion', href: `${base}/spd` }
    ]
  },
  { name: 'SUPPORTED BY', href: `${base}/supported-by` },
  { 
    name: 'ORGANISERS+', 
    href: '#',
    dropdown: [
      { name: 'About TPF', href: `${base}/about-tpf` },
      { name: 'PDAS Organisation', href: `${base}/pdas-organization` }
    ]
  },
  { name: 'CONTACT US', href: `${base}/contact` }
];