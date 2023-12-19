ARG UID=1000
ARG JDK_VERSION=21

FROM eclipse-temurin:${JDK_VERSION}-jdk AS base

ARG UID

RUN \
  useradd -u $UID -m -d /var/www devuser \
  && chown -R devuser:devuser /var/www

COPY --chown=$UID . /var/www/app

WORKDIR /var/www/app

USER devuser

RUN ./gradlew build
