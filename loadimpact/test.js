import { check, sleep } from "k6";
import { Rate } from "k6/metrics";
import http from "k6/http";

// See https://docs.k6.io/docs/options for other options
export let options = {
  // simulate rampup of traffic from 1 to 200 users over 1 minutes.
  stages: [
    { duration: "1m", target: 10 },
  ]
};

let baseUrl = 'http://13.235.70.246';

// let's collect all errors in one metric
let errorRate = new Rate("API errors");

// let authenticate = function(user, password){
//   let authUserRes = http.post(`${baseUrl}/admin/auth/login`, JSON.stringify({user: user, password: password}));

//   // check if the authentication was successful, or increase error metric
//   if (!check(authUserRes, { "login successful": (r) => r.status === 200})) {
//     errorRate.add(1);
//   }

//   return true;
// };

// let getUser = function(user_id, token){
//   let userRes = http.get(`${baseUrl}/anything/${user_id}`, {}, {
//     headers: {
//       Authorization: `Token ${token}`
//     }
//   });

//   if (!check(userRes, { "user retrieval successful": (r) => r.status === 200})) {
//     errorRate.add(1);
//   }

//   return userRes.json();
// };

let getSleep = function(sec){
  let userRes = http.get(`${baseUrl}/api/sleep/${sec}`);

  if (!check(userRes, { "sleep called": (r) => r.status === 200})) {
    errorRate.add(1);
  }

  return true;
};



export default function() {
  // authenticate("admin", "admin");
  getSleep(5);

  sleep(1); // user usually waits 1 second after this flow
}

