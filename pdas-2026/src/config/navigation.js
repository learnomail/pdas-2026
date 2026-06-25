// src/config/navigation.js
export const navLinks = [
  { name: 'HOME', href: '/' },
  { 
    name: 'ABOUT PDAS 2026+', 
    href: '#',
    dropdown: [
      { name: 'Exhibitor Profile', href: '/exhibitor-profile' },
      { name: 'Visitor Profile', href: '/visitor-profile' },
      { name: 'Who Should Participate', href: '/who-should-participate' },
      { name: 'Why To Participate', href: '/why-to-participate' },
      { name: 'Participating Options', href: '/participating-options' }
    ]
  },
  { 
    name: 'KEY HIGHLIGHTS+', 
    href: '#',
    dropdown: [
      { name: 'Expo', href: '/expo' },
      { name: 'B2B & B2G Meetings', href: '/brb-b2g' },
      { name: 'Strategic Panel Discussion', href: '/spd' }
    ]
  },
  { name: 'SUPPORTED BY', href: '/supported-by' },
  { 
    name: 'ORGANISERS+', 
    href: '#',
    dropdown: [
      { name: 'About TPF', href: '/about-tpf' },
      { name: 'PDAS Organisation', href: '/pdas-organization' }
    ]
  },
  { name: 'CONTACT US', href: '/contact' }
];