CREATE TABLE lti_key_set
(
    id VARCHAR(36) NOT NULL,

    CONSTRAINT pk_lti_key_set_id PRIMARY KEY (id)
);

CREATE TABLE lti_key
(
    id          VARCHAR(36) NOT NULL,
    key_set_id  VARCHAR(36) NOT NULL,
    private_key TEXT        NOT NULL,
    alg         TEXT        NOT NULL,

    CONSTRAINT pk_lti_key_id PRIMARY KEY (id)
);

CREATE TABLE lti_registration
(
    id                             VARCHAR(36)  NOT NULL,
    issuer                         VARCHAR(255) NOT NULL,
    client_id                      VARCHAR(255) NOT NULL,
    platform_login_auth_endpoint   TEXT         NOT NULL,
    platform_service_auth_endpoint TEXT         NOT NULL,
    platform_JWKS_endpoint         TEXT         NOT NULL,
    platform_auth_provider         TEXT,
    key_set_id                     VARCHAR(36)  NOT NULL REFERENCES lti_key_set (id),

    CONSTRAINT pk_lti_registration_id PRIMARY KEY (id),
    UNIQUE (issuer, client_id)
);

CREATE TABLE lti_deployment
(
    deployment_id   VARCHAR(255) NOT NULL,
    registration_id VARCHAR(36)  NOT NULL REFERENCES lti_registration (id),
    customer_id     TEXT         NOT NULL,

    CONSTRAINT pk_deployment_id PRIMARY KEY (registration_id, deployment_id)
);

INSERT INTO lti_key_set
VALUES ('3b204b08-a5b7-4724-8b4c-426c7515c817');

INSERT INTO lti_key
VALUES ('feb6fdd5-c3d0-4b18-9f94-485d85baf14e',
        '3b204b08-a5b7-4724-8b4c-426c7515c817',
        '-----BEGIN RSA PRIVATE KEY-----
MIIEoQIBAAKCAQB7PNJtvimeF8tkTRe0J3mcGR5PsgChdn4QalMIpRI5WNCRL+pv
n2+XPEy0CHDV+svf12HGXqHbCzwf8Pq1rTklNNhEb66PlLuar8ak+u8aaeFI3ef/
/HA/GBJd2KGBbXIiSaYnBxbtJNCDkkhOwtsNAR5CIEap7+AU0Mi0EtjdI1JJzyOT
T3hpjzcZnmMFBkBN4fHz4ww88gd2QigXe0hoVDP7SGe5017pDxNqNlbKe+GchTAY
vypisbUne3jNsBfK8oC2wWBI6GKct7wX07M1EjliYVz529Wv4a7RnD98Ten5wv90
ofOg7i8T+imItp1qQZAxQUauC15NOtXsT/NjAgMBAAECggEAXviTTeFTXzMFGinT
D5GwRRySYGZT2BphsjLOBIZ5kdog+RJM/3KF462jisZKdoyM2ta30dCRuSViU1c5
ThLNTB/6XlsW0i2TmfTGB9QduWRJKgdgx8R5mBXr6YiNhhma8FODiOYMw/ov+oUb
1h6SAuaOs/T9n+5s6H2xfhxcJaYF3DAlZJeoISQm9P3YIUd5X/EOpw31r8l+WoLh
hCCPmcNNkJY5rrb+0w86fZjAY656oU/WkcMVFJVc5TIURyX+6B5RM5rztP8Y0m0L
adsBC+E3oC9G52Q7vfem4FHtpcBleS+SM83i1Y7L1Knhaalb3gcMkgcdhzm1KC1j
SfJLsQKBgQC3BwyTLwnjmHn9lb90z8mfp7LWFjuZ3xtkWhMUq9qI/0h4LW2YwwA8
6VTD78tLTeAd5+yHcfLsadjf+E/aoLpgS8//zIw/Sx/ccC9DLf23kNM79535cy4t
UThgjk3qMh/0pavjTcvNnTBP6xj+eOzLP8s5XZu5haj02XHvwz9ROwKBgQCsXztB
IIWbV1/Y3MdW9EWfEMn3zPwY25mBs5plxKfxE/I3MIUjo4vATCUSaP2IjWBxUr7o
mgQceqWPMkmvAgp2j0CgOF9vxV5VZOoBz+1V4IXf5O/oWxX/lSYlZ0Z01vHxSSLo
fl075kNtfUlpsbPN8QxfbZkYMstnvAr6jO7D+QKBgFlxZXDMDP4fdoY5Vw3juXl/
P4Ml7Ex+3mkFJ8vzS+GlN6obMTL1ILmjoVv7ZJLRZNPYkhuC0R89ftG9DHEgGNSU
V/p+4I7RzKkyXbZr1FCPwtrMYHQWGJvm1DFDecoYYstw5vY2/4Dk70Yu8tDxEW8m
Js9K8p4QNogpd2efN+MfAoGAH4/QabxqumblRfAnD+TqWpXYZWdDQcnz8avROZEo
rxvX3gMkXcI0dKF8qEJRKg+4+QcNrcmFtzE931p143WcNNlGHBA2aWDaRQiVUH+i
FXdnC/f/daw3+vR0Z6ThYcN5yZR6r9dzeuROtF2cc532Ll9UxKRsw+GJHRVxbS8h
CQECgYA6qBbEnuY18yYYG5Fzlx7MYYFN6adtp1rqEohxxldN5m5lqsyxtSvS7tJi
aZG6M4f66uv5HL5gjXMOfLXjkUhrRtJHqe11661FARtm/0CakFUis1A/aVJhgsku
yFgUXIDHO13JmzHJqJjhaWp3UGygHDPIkP0gVTNtsh7Wkts+tA==
-----END RSA PRIVATE KEY-----',
        'RS256');

INSERT INTO lti_registration
VALUES ('4a559504-1d90-4980-8a8e-e0875ff3027f',
        'https://problembook.moodlecloud.com',
        'hwXHlcGBlGr5uDj',
        'https://problembook.moodlecloud.com/mod/lti/auth.php',
        'https://problembook.moodlecloud.com/mod/lti/token.php',
        'https://problembook.moodlecloud.com/mod/lti/certs.php',
        NULL,
        '3b204b08-a5b7-4724-8b4c-426c7515c817');

INSERT INTO lti_deployment
VALUES ('1',
        '4a559504-1d90-4980-8a8e-e0875ff3027f',
        'customer_1');