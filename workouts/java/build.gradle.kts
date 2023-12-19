plugins {
  id("java")
  id("com.diffplug.spotless") version "6.23.3"
}

group = "jelovac.swe-workout"
version = "1.0-SNAPSHOT"

repositories {
  mavenCentral()
}

dependencies {
  testImplementation(platform("org.junit:junit-bom:5.9.1"))
  testImplementation("org.junit.jupiter:junit-jupiter")
}

spotless {
  java {
    googleJavaFormat()
    formatAnnotations()
    removeUnusedImports()
  }
}

tasks.test {
  useJUnitPlatform()
}


